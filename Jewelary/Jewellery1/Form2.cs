using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
//using System.Data.SqlClient;
//using System.IO;

namespace Jewellery_01
{
    public partial class Form2 : Form
    {
        public Form2()
        {
            InitializeComponent();
        }

        //SqlConnection conn = new SqlConnection("Data Source=DESKTOP-MLTLTQ1;Initial Catalog=Jewellery;Integrated Security=True");
        //SqlCommand cmd;
       string imgLocation = "";

        private void Form2_Load(object sender, EventArgs e)
        {
            // TODO: This line of code loads data into the 'jewelleryDataSet1.Item' table. You can move, or remove it, as needed.
            //this.itemTableAdapter.Fill(this.jewelleryDataSet1.Item);

        }

        private void kryptonButton1_Click(object sender, EventArgs e)
        {
            OpenFileDialog dialog = new OpenFileDialog();
            dialog.Filter = "png files(*.png)|*.png|jpg files(*.jpg)|*.jpg|All files(*.*)|*.*";
            if (dialog.ShowDialog() == DialogResult.OK)
            {
                imgLocation = dialog.FileName.ToString();
                textBox1.Text = dialog.FileName;
                pictureBox1.ImageLocation = imgLocation;
            }

        }

        private void kryptonButton2_Click(object sender, EventArgs e)
        {
           /* byte[] images = null;
            FileStream Stream = new FileStream(imgLocation,FileMode.Open,FileAccess.Read);
            BinaryReader brs = new BinaryReader(Stream);
            images = brs.ReadBytes((int)Stream.Length);

            conn.Open();
            string sqlQuery = "Insert into Item Values('" + txt1.Text + "','" + txt4.Text + "','" + txt2.Text + "','"+txt3.Text+"')";
            cmd = new SqlCommand(sqlQuery, conn);
            //cmd.Parameters.Add(new SqlParameter("@images", images));
            int N = cmd.ExecuteNonQuery();
            conn.Close();
            MessageBox.Show(N.ToString() + "Data Saved Successfully...!");   */     }
    }
}
