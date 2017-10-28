using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace TallerSoftware
{
    public partial class Form1 : Form
    {
        Logica log;
        public Form1()
        {
            InitializeComponent();
            log = new Logica();
        }

        private void btn1_Click(object sender, EventArgs e)
        {
         
            MessageBox.Show(log.penal(1));
        }

        private void btn2_Click(object sender, EventArgs e)
        {
           
            MessageBox.Show(log.penal(2));
        }

        private void btn3_Click(object sender, EventArgs e)
        {
         
            MessageBox.Show(log.penal(3));
        }

        private void btn4_Click(object sender, EventArgs e)
        {
           
            MessageBox.Show(log.penal(4));
        }

        private void btn5_Click(object sender, EventArgs e)
        {
           
            MessageBox.Show(log.penal(5));
        }

        private void btn6_Click(object sender, EventArgs e)
        {
           
            MessageBox.Show(log.penal(6));
        }
    }
}
