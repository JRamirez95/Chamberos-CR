using PenalesGameTaller1.Logica;
using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace PenalesGameTaller1
{
    public partial class Form1 : Form
    {
        player player;
        public Form1()
        {
            InitializeComponent();
            player = new player();
        }
        public int disparoNumero = 0;

        private void btn1_Click(object sender, EventArgs e)
        {
            disparoNumero = 1;
            MessageBox.Show(player.Juego(disparoNumero));
            
        }

        private void btn2_Click(object sender, EventArgs e)
        {
            disparoNumero = 2;
            MessageBox.Show(player.Juego(disparoNumero));
        }

        private void btn3_Click(object sender, EventArgs e)
        {
            disparoNumero = 3;
            MessageBox.Show(player.Juego(disparoNumero));
        }

        private void btn4_Click(object sender, EventArgs e)
        {
            disparoNumero = 4;
            MessageBox.Show(player.Juego(disparoNumero));
        }

        private void btn5_Click(object sender, EventArgs e)
        {
            disparoNumero = 5;
            MessageBox.Show(player.Juego(disparoNumero));
        }

        private void btn6_Click(object sender, EventArgs e)
        {
            disparoNumero = 6;
            MessageBox.Show(player.Juego(disparoNumero));
        }
    }
}
