using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using ComponentFactory.Krypton.Toolkit;
using MySql.Data.MySqlClient;

namespace Jewellery_01
{
    public partial class Form1 : KryptonForm
    {

        functions fn = new functions();
        
        String query;


        public Form1()
        {
            InitializeComponent();
        }

        private void panel2_Paint(object sender, PaintEventArgs e)
        {

        }

        private void label11_Click(object sender, EventArgs e)
        {

        }

        private void kryptonButton1_Click(object sender, EventArgs e)
        {
            query = "select AdminName , Password from admin where AdminName ='" + kryptonTextBox1.Text + "'and Password ='" + kryptonTextBox2.Text + "'";
            DataSet ds = fn.getData(query);
            if (ds.Tables[0].Rows.Count != 0)
            {
              
                this.Hide();
                INSERT_IMAGE admin = new INSERT_IMAGE();
                admin.ShowDialog();
                this.Close();
            }
            else
            {

                if (MessageBox.Show("Password is Incorect", "Confirmation", MessageBoxButtons.OKCancel, MessageBoxIcon.Warning) == DialogResult.OK)
                {
                    kryptonTextBox2.Clear();
                }
            }




        }

        private void Form1_Load(object sender, EventArgs e)
        {

        }
    }
}
