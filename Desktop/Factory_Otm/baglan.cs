using System;
using System.Collections.Generic;
using System.Data.SQLite;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

using MySql.Data.MySqlClient;

namespace Factory_Otm
{
    public class baglan
    {
        //public static SQLiteConnection connection = new SQLiteConnection("Data source=.\\Factor_Db.db;Version=3");
        //sqlite için



        //mysql server için
          public static MySqlConnection connection = new MySqlConnection("server=127.0.0.1; user=root; database=factor_db; password=");

            

        

    }
}
