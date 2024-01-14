using System;
using System.IO;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using MySql.Data.MySqlClient;

namespace Jewellery_01
{
    public partial class INSERT_IMAGE : Form
    {
        functions fn = new functions();
        MySqlConnection connection = new MySqlConnection("datasource=127.0.0.1;port=3306;username=root;password=;database=jewellary");
        String query;
        MySqlCommand command;

        MySqlDataReader reader;
        public INSERT_IMAGE()
        {
            InitializeComponent();
        }

        
       

        private void button1_Click(object sender, EventArgs e)
        {
            if(openFileDialog1.ShowDialog() == DialogResult.OK)
            {
                textBox1.Text = openFileDialog1.FileName;
            }
        }

        /*void BindData()
        {


            query = "select * from product";
            DataSet ds = fn.getData(query);
            dataGridView1.DataSource = ds.Tables[0];

        }*/

        void Clear()
        {
            txtId.Text = "";
            txtBrand.Text = "";
            txtName.Text = "";
            txtPrice.Text = "";
            textBox1.Text = "";
          
        }

        private void insertbtn_Click(object sender, EventArgs e)
        {
            try
            {
               FileStream fs1 = new FileStream(textBox1.Text, System.IO.FileMode.Open, System.IO.FileAccess.Read);
                byte[] image = new byte[fs1.Length];
                fs1.Read(image, 0, Convert.ToInt32(fs1.Length));
                fs1.Close();


                /*con.Open();
                 SqlCommand cmd = new SqlCommand("Insert into BIO_DATA(Id,Item_brand,Item_name,Item_price,Item_image,Item_register) Values('" + txtId.Text + "','" + txtBrand.Text + "','" + txtName.Text + "','" + txtPrice.Text + "','" + textBox1.Text+ "','" + txtRegister.Text + "')", con);
                 // SqlParameter prm = new SqlParameter("@Pic", SqlDbType.VarBinary, image.Length, ParameterDirection.Input, false, 0, 0, null, DataRowVersion.Current, image);
                 //cmd.Parameters.Add(prm);
                 cmd.ExecuteNonQuery();
                 MessageBox.Show ("Data Saved Successfully!");
                 con.Close();*/

                if ( txtBrand.Text != "" && txtName.Text != "" && txtPrice.Text != "" )
                {
                    
                 


                    query = "insert into product(item_brand,item_name,item_price,item_image) values ('" + txtBrand.Text + "','" + txtName.Text + "','" + txtPrice.Text + "','" + textBox1.Text  + "');";
                    fn.setData(query, "Added Successfully.");
                    INSERT_IMAGE_Load(this, null);

                }
                else
                {
                    MessageBox.Show("Fill All Fields.", "Warning !!", MessageBoxButtons.OK,
                   MessageBoxIcon.Warning);
                }
            }
            catch(Exception ex)
            {
                MessageBox.Show(ex.Message);
            }
        }

        private void kryptonButton1_Click(object sender, EventArgs e)
        {
            /*string query_update = "update BIO_DATA set Id = '" +txtId.Text+ "', Item_brand = '" +txtBrand.Text+ "', Item_name = '" +txtName.Text+ "', Item_price = '" +txtPrice.Text+ "' where Id='" +txtId.Text+ " '";
            SqlCommand cmnd = new SqlCommand(query_update, con);
            con.Open();
            cmnd.ExecuteNonQuery();*/


            query = "update product set item_brand = '"  + txtBrand.Text + "', item_name = '" + txtName.Text + "', item_price = '" + txtPrice.Text + "' where item_id='" + txtId.Text + " '";
            fn.setData(query, "Updated Successfully.");

            INSERT_IMAGE_Load(this, null);
            Clear();
           
        }

        private void kryptonButton2_Click(object sender, EventArgs e)
        {
            /*string query_delete = "delete from BIO_DATA where Id='" +txtId.Text+ " '";           
            SqlCommand cmnd = new SqlCommand(query_delete, con);         
            con.Open();          
            cmnd.ExecuteNonQuery();



            query = "delete from product where Id='" + txtId.Text + " '";
            DataSet ds = fn.getData(query);
            dataGridView1.DataSource = ds.Tables[0];
            INSERT_IMAGE_Load(this, null);

            MessageBox.Show("Deleted successfully!");
            //con.Close();
            Clear();*/



            if (MessageBox.Show("are you sure?", "Confirmation...!", MessageBoxButtons.YesNo, MessageBoxIcon.Warning) == DialogResult.Yes)
            {
                query = "delete from product where item_id=" + txtId.Text + "";
                fn.setData(query, "Record Deleted.");
                INSERT_IMAGE_Load(this, null);

            }
        }

        private void INSERT_IMAGE_Load(object sender, EventArgs e)
        {
            // TODO: This line of code loads data into the 'jewelleryDataSet.BIO_DATA' table. You can move, or remove it, as needed.
            //this.bIO_DATATableAdapter.Fill(this.jewelleryDataSet.BIO_DATA);
           //textBox1.Text = "./assests/";   //path important line.do not delete

            query = "select * from product";
            DataSet ds = fn.getData(query);
            dataGridView1.DataSource = ds.Tables[0];

        }

        private void dataGridView1_CellContentClick(object sender, DataGridViewCellEventArgs e)
        {

        }
        int i;
        private void dataGridView1_CellContentClick_1(object sender, DataGridViewCellEventArgs e)
        {
            i = e.RowIndex;
            DataGridViewRow row = dataGridView1.Rows[i];
            txtId.Text = row.Cells[0].Value.ToString();
        }

        private void kryptonButton3_Click(object sender, EventArgs e)
        {

            connection.Open();
            string selectQuery = "Select * from product where Item_id = '" + txtId.Text + " ' ";
            command = new MySqlCommand(selectQuery, connection);
            reader = command.ExecuteReader();
            if (reader.Read())
            {
                txtBrand.Text = reader.GetString("item_brand");
                txtName.Text = reader.GetString("item_name");
                txtPrice.Text = reader.GetString("item_price");
                textBox1.Text = reader.GetString("item_image");
              

            }

            connection.Close();
        }

        private void label1_Click(object sender, EventArgs e)
        {
            Reserve select = new Reserve();
            select.Show();
            this.Hide();
        }

        /* private void kryptonLabel6_Paint(object sender, PaintEventArgs e)
         {
             Form1 select = new Form1();
             select.Show();
             this.Hide();
         }*/
    }
}
