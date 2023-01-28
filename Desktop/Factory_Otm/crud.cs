using System;
using System.Collections.Generic;
using System.Data;
using System.Data.SQLite;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

using MySql.Data.MySqlClient;

namespace Factory_Otm
{
    public class crud
    {
        static DataTable dt;
        public static DataTable Listele(string sql)
        {
            dt = new DataTable();

            // Sqlite için
            //  SQLiteDataAdapter adtr = new SQLiteDataAdapter(sql, baglan.connection);//baglan clasından connection ı buraya alıp bağladık


            //Mysql İÇin
            MySqlDataAdapter adtr = new MySqlDataAdapter(sql, baglan.connection);
            adtr.Fill(dt);
            return dt;
        }
        public static bool islem(string sql)
        {
            int watch = 0;

            // Sqlite için
            // SQLiteCommand command = new SQLiteCommand(sql, baglan.connection);


            //Mysql İÇin
            MySqlCommand command = new MySqlCommand(sql, baglan.connection);

            baglan.connection.Open();
            watch = command.ExecuteNonQuery();
            baglan.connection.Close();

            if (watch == 0)
            {
                return false;
            }
            else
            {
                return true;
            }
           

        }
    }
}
