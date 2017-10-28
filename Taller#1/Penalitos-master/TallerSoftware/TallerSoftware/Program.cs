using DBAccess;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace TallerSoftware
{
    static class Program
    {
        public static DBAccess.DBAccess da;
        /// <summary>
        /// The main entry point for the application.
        /// </summary>
        [STAThread]
        static void Main()
        {
            Application.EnableVisualStyles();

            string connectionString = System.Configuration.ConfigurationManager.ConnectionStrings["Pg"].ConnectionString;
            Program.da = new PgAccess(connectionString);

            Application.SetCompatibleTextRenderingDefault(false);
            Application.Run(new Form1());
        }
    }
}
