using DBAccess;
using System;
using System.Collections.Generic;
using System.Data;

using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace TallerSoftware
{
    public class Logica : ErrorHandler 
    {
        public int tiro = 0;
        public int oportunidad = 5;
        public int portero = 0;
        public int goles = 0;
        public int fallos = 0;
        public int derecha = 0;
        public int centro = 0;
        public int izquierda = 0;
        public string noHayGoles = "";
        public string posArquero = "";
        public string posTiro = "";


        public string penal(int tiro)
        {

            if (oportunidad != 0)
            {
                Random rnd = new Random();
                int port = rnd.Next(1, 6);

                posTiro = posTiro + tiro + ",";
                posArquero = posArquero + port + ",";
                oportunidad -= 1;
                if (port == tiro)
                {
                   
                    fallos += 1;

                    return "Tiro detenido";
                }
                else
                {
                    if (tiro == 1 || tiro == 4)
                    {
                        izquierda += 1;
                    }
                    else if (tiro == 2 || tiro == 5)
                    {
                        centro += 1;
                    }
                    else
                    {
                        derecha += 1;
                    }
                   
                    goles += 1;
                    return "Gol!";
                }
            }
            else
            {
                if (derecha == 0)
                {
                    noHayGoles = "Derecha";
                } else if (izquierda == 0)
                {
                    noHayGoles = "izquierda";
                }
                else if (centro ==0)
                {
                    noHayGoles = "centro";
                }

                Insert();
                return "Ya no te quedan intentos\n"+"Posiciones del Arquero: "+posArquero+"\nTiros realizados: "+posTiro+"\nGoles: "+goles+"\nFallados: "+fallos+"\nGoles realizados en las diferentes areas: \n   Derecha: "+derecha+"\n   Centro: "+centro+"\n   Izquierda: "+izquierda+"\nNo hubieron goles en: "+ noHayGoles;
                

            }
            
            
           
  
        }

        public void Insert()
        {
            Dictionary<string, object> parametros = new Dictionary<string, object>();
            parametros.Add("arquero", this.posArquero);
            parametros.Add("tiros", this.posTiro);
            parametros.Add("goles", this.goles);
            parametros.Add("fallados", this.fallos);
            parametros.Add("golesD", this.derecha);
            parametros.Add("golesC", this.centro);
            parametros.Add("golesIz", this.izquierda);
            parametros.Add("sinGoles", this.noHayGoles);

            DataTable result = Program.da.SqlQuery("insert into penales(arquero,tiros,goles,fallados,golesd,golesc,golesiz,singoles ) values (@arquero,@tiros,@goles,@fallados,@golesD,@golesC,@golesIz,@sinGoles) returning id;", parametros);
            if (Program.da.isError)
            {
                this.isError = true;
                this.errorDescription = Program.da.errorDescription;
                return;
            }
            
        }

       

    }
}
