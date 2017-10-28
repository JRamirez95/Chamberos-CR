using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace PenalesGameTaller1.Logica
{
    class player
    {
        //private int[] lanzamientosJug;
        private List<int> lanzamientosPor = new List<int>();
        private List<int> lanzamientosJug = new List<int>();
        private int goles = 0;
        private int paradas = 0;
        private string golDerecha = "no hubieron goles por la derecha";
        private string golCentro = "no hubieron goles por la centro";
        private string golIzquierda = "no hubieron goles por la izquierda";
        private int golesDerecha = 0;
        private int golesIzquierda = 0;
        private int golesCentro = 0;
        private int turno = 0;
        int porteroDireccion;

        public string Juego(int disparoDireccion)
        {

            if (turno != 5)
            {
                Random random = new Random();
                porteroDireccion = random.Next(1, 6);


                lanzamientosJug.Add(disparoDireccion);
                lanzamientosPor.Add(porteroDireccion);


                if (disparoDireccion == porteroDireccion)
                {
                    paradas++;
                    turno++;
                    return "Keeeeyyylloooorrr";
                }
                else if (disparoDireccion == 3 || disparoDireccion == 4)
                {
                    goles++;
                    golesIzquierda++;
                    golIzquierda = "SI hubieron goles por la izquierda";
                    turno++;
                    return "Gooollllaaaaazzzoooo";
                }
                else if (disparoDireccion == 2 || disparoDireccion == 5)
                {
                    goles++;
                    golesCentro++;
                    golCentro = "SI hubieron goles por la centro";
                    turno++;
                    return "Gooollllaaaaazzzoooo";
                }
                else if (disparoDireccion == 1 || disparoDireccion == 6)
                {
                    goles++;
                    golesDerecha++;
                    golDerecha = "SI hubieron goles por la derecha";
                    turno++;
                    return "Gooollllaaaaazzzoooo";
                }
            } return "Juego Finalizado"+ "\n"+
                "Direccion lazamientos jugador = "+ lanzamientosJug +"\n"+
                "Direccion lazamientos portero = "+ lanzamientosPor + "\n" +
                "Goles conseguidos = "+ goles+ "\n"+
                "Penales fallados = " + paradas + "\n" +
                "Goles por la derecha = " +golesDerecha+ "\n" +
                "Goles por el centro = " + golesCentro + "\n" +
                "Goles por la izquierda = " + golesIzquierda + "\n" +
                golDerecha + "\n"+
                golCentro + "\n" +
                golIzquierda
                ;
        }

    }
}


