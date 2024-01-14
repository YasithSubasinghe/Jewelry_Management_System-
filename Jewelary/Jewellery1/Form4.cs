using System;
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
    public partial class Reserve : Form
    {
        functions fn = new functions();
        MySqlConnection connection = new MySqlConnection("datasource=127.0.0.1;port=3306;username=root;password=;database=jewellary");
        String query;


      public Reserve()
        {
            InitializeComponent();
        }

        /*SqlConnection con = new SqlConnection("Data Source=DESKTOP-MLTLTQ1;Initial Catalog=Cafeteria;Integrated Security=True");
        SqlCommand cmd = new SqlCommand();
        SqlDataAdapter adptr = new SqlDataAdapter();
        DataTable dtable = new DataTable();*/

        private void Reserve_Load(object sender, EventArgs e)
        {
            query = "select * from reserve";
            DataSet ds = fn.getData(query);
            dataGridView1.DataSource = ds.Tables[0];


            /*string qry = "select * from reserve";
            cmd.Connection = con;
            cmd.CommandText = qry.ToLower();
            con.Open();
            adptr.SelectCommand = cmd;
            adptr.Fill(dtable);
            dataGridView1.DataSource = dtable;
            dataGridView1.Refresh();
            con.Close();*/
        }
    }
}
