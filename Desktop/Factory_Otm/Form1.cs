using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Data.OleDb;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

using MySql.Data.MySqlClient;

namespace Factory_Otm
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
            listele_personel();
            listele_is();
            listele_yapilan();
            listele_bitmis();

        }

        private void InitializeComponent()
        {
            this.dataGridView1 = new System.Windows.Forms.DataGridView();
            this.label1 = new System.Windows.Forms.Label();
            this.btn_yenile_yapilmis = new System.Windows.Forms.Button();
            this.btn_basla = new System.Windows.Forms.Button();
            this.btn_bitir = new System.Windows.Forms.Button();
            this.btn_yenile_yapilan = new System.Windows.Forms.Button();
            this.label2 = new System.Windows.Forms.Label();
            this.dataGridView2 = new System.Windows.Forms.DataGridView();
            this.label3 = new System.Windows.Forms.Label();
            this.label4 = new System.Windows.Forms.Label();
            this.label5 = new System.Windows.Forms.Label();
            this.label6 = new System.Windows.Forms.Label();
            this.dataGridView3 = new System.Windows.Forms.DataGridView();
            this.dataGridView4 = new System.Windows.Forms.DataGridView();
            ((System.ComponentModel.ISupportInitialize)(this.dataGridView1)).BeginInit();
            ((System.ComponentModel.ISupportInitialize)(this.dataGridView2)).BeginInit();
            ((System.ComponentModel.ISupportInitialize)(this.dataGridView3)).BeginInit();
            ((System.ComponentModel.ISupportInitialize)(this.dataGridView4)).BeginInit();
            this.SuspendLayout();
            // 
            // dataGridView1
            // 
            this.dataGridView1.AutoSizeColumnsMode = System.Windows.Forms.DataGridViewAutoSizeColumnsMode.Fill;
            this.dataGridView1.ColumnHeadersHeightSizeMode = System.Windows.Forms.DataGridViewColumnHeadersHeightSizeMode.AutoSize;
            this.dataGridView1.Location = new System.Drawing.Point(10, 539);
            this.dataGridView1.Name = "dataGridView1";
            this.dataGridView1.RowHeadersWidth = 51;
            this.dataGridView1.RowTemplate.Height = 24;
            this.dataGridView1.Size = new System.Drawing.Size(1017, 130);
            this.dataGridView1.TabIndex = 0;
            // 
            // label1
            // 
            this.label1.AutoSize = true;
            this.label1.Font = new System.Drawing.Font("Microsoft Sans Serif", 12F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(162)));
            this.label1.Location = new System.Drawing.Point(5, 506);
            this.label1.Name = "label1";
            this.label1.Size = new System.Drawing.Size(126, 25);
            this.label1.TabIndex = 2;
            this.label1.Text = "Yapılmış İşler";
            // 
            // btn_yenile_yapilmis
            // 
            this.btn_yenile_yapilmis.Location = new System.Drawing.Point(956, 510);
            this.btn_yenile_yapilmis.Name = "btn_yenile_yapilmis";
            this.btn_yenile_yapilmis.Size = new System.Drawing.Size(75, 23);
            this.btn_yenile_yapilmis.TabIndex = 3;
            this.btn_yenile_yapilmis.Text = "Yenile";
            this.btn_yenile_yapilmis.UseVisualStyleBackColor = true;
            this.btn_yenile_yapilmis.Click += new System.EventHandler(this.btn_yenile_Click);
            // 
            // btn_basla
            // 
            this.btn_basla.BackColor = System.Drawing.SystemColors.MenuHighlight;
            this.btn_basla.Location = new System.Drawing.Point(732, 6);
            this.btn_basla.Name = "btn_basla";
            this.btn_basla.Size = new System.Drawing.Size(170, 276);
            this.btn_basla.TabIndex = 4;
            this.btn_basla.Text = "Başlat";
            this.btn_basla.UseVisualStyleBackColor = false;
            this.btn_basla.Click += new System.EventHandler(this.btn_basla_Click);
            // 
            // btn_bitir
            // 
            this.btn_bitir.BackColor = System.Drawing.Color.IndianRed;
            this.btn_bitir.Location = new System.Drawing.Point(908, 5);
            this.btn_bitir.Name = "btn_bitir";
            this.btn_bitir.Size = new System.Drawing.Size(123, 277);
            this.btn_bitir.TabIndex = 5;
            this.btn_bitir.Text = "Bitir";
            this.btn_bitir.UseVisualStyleBackColor = false;
            this.btn_bitir.Click += new System.EventHandler(this.btn_bitir_Click);
            // 
            // btn_yenile_yapilan
            // 
            this.btn_yenile_yapilan.Location = new System.Drawing.Point(956, 320);
            this.btn_yenile_yapilan.Name = "btn_yenile_yapilan";
            this.btn_yenile_yapilan.Size = new System.Drawing.Size(75, 23);
            this.btn_yenile_yapilan.TabIndex = 8;
            this.btn_yenile_yapilan.Text = "Yenile";
            this.btn_yenile_yapilan.UseVisualStyleBackColor = true;
            this.btn_yenile_yapilan.Click += new System.EventHandler(this.btn_yenile_yapilan_Click);
            // 
            // label2
            // 
            this.label2.AutoSize = true;
            this.label2.Font = new System.Drawing.Font("Microsoft Sans Serif", 12F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(162)));
            this.label2.Location = new System.Drawing.Point(7, 320);
            this.label2.Name = "label2";
            this.label2.Size = new System.Drawing.Size(118, 25);
            this.label2.TabIndex = 7;
            this.label2.Text = "Yapılan İşler";
            // 
            // dataGridView2
            // 
            this.dataGridView2.AutoSizeColumnsMode = System.Windows.Forms.DataGridViewAutoSizeColumnsMode.Fill;
            this.dataGridView2.ColumnHeadersHeightSizeMode = System.Windows.Forms.DataGridViewColumnHeadersHeightSizeMode.AutoSize;
            this.dataGridView2.Location = new System.Drawing.Point(12, 353);
            this.dataGridView2.Name = "dataGridView2";
            this.dataGridView2.RowHeadersWidth = 51;
            this.dataGridView2.RowTemplate.Height = 24;
            this.dataGridView2.Size = new System.Drawing.Size(1017, 130);
            this.dataGridView2.TabIndex = 6;
            // 
            // label3
            // 
            this.label3.AutoSize = true;
            this.label3.Font = new System.Drawing.Font("Microsoft Sans Serif", 15F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(162)));
            this.label3.Location = new System.Drawing.Point(13, 13);
            this.label3.Name = "label3";
            this.label3.Size = new System.Drawing.Size(120, 29);
            this.label3.TabIndex = 9;
            this.label3.Text = "Personel ";
            // 
            // label4
            // 
            this.label4.AutoSize = true;
            this.label4.Font = new System.Drawing.Font("Microsoft Sans Serif", 15F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(162)));
            this.label4.Location = new System.Drawing.Point(13, 165);
            this.label4.Name = "label4";
            this.label4.Size = new System.Drawing.Size(32, 29);
            this.label4.TabIndex = 10;
            this.label4.Text = "İş";
            // 
            // label5
            // 
            this.label5.AutoSize = true;
            this.label5.Font = new System.Drawing.Font("Microsoft Sans Serif", 15F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(162)));
            this.label5.Location = new System.Drawing.Point(129, 13);
            this.label5.Name = "label5";
            this.label5.Size = new System.Drawing.Size(20, 29);
            this.label5.TabIndex = 11;
            this.label5.Text = ":";
            // 
            // label6
            // 
            this.label6.AutoSize = true;
            this.label6.Font = new System.Drawing.Font("Microsoft Sans Serif", 15F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(162)));
            this.label6.Location = new System.Drawing.Point(129, 165);
            this.label6.Name = "label6";
            this.label6.Size = new System.Drawing.Size(20, 29);
            this.label6.TabIndex = 12;
            this.label6.Text = ":";
            // 
            // dataGridView3
            // 
            this.dataGridView3.AutoSizeColumnsMode = System.Windows.Forms.DataGridViewAutoSizeColumnsMode.Fill;
            this.dataGridView3.ColumnHeadersHeightSizeMode = System.Windows.Forms.DataGridViewColumnHeadersHeightSizeMode.AutoSize;
            this.dataGridView3.Location = new System.Drawing.Point(155, 5);
            this.dataGridView3.Name = "dataGridView3";
            this.dataGridView3.RowHeadersWidth = 51;
            this.dataGridView3.RowTemplate.Height = 24;
            this.dataGridView3.Size = new System.Drawing.Size(544, 120);
            this.dataGridView3.TabIndex = 13;
            // 
            // dataGridView4
            // 
            this.dataGridView4.AutoSizeColumnsMode = System.Windows.Forms.DataGridViewAutoSizeColumnsMode.Fill;
            this.dataGridView4.ColumnHeadersHeightSizeMode = System.Windows.Forms.DataGridViewColumnHeadersHeightSizeMode.AutoSize;
            this.dataGridView4.Location = new System.Drawing.Point(155, 165);
            this.dataGridView4.Name = "dataGridView4";
            this.dataGridView4.RowHeadersWidth = 51;
            this.dataGridView4.RowTemplate.Height = 24;
            this.dataGridView4.Size = new System.Drawing.Size(544, 117);
            this.dataGridView4.TabIndex = 14;
            // 
            // Form1
            // 
            this.ClientSize = new System.Drawing.Size(1042, 675);
            this.Controls.Add(this.dataGridView4);
            this.Controls.Add(this.dataGridView3);
            this.Controls.Add(this.label6);
            this.Controls.Add(this.label5);
            this.Controls.Add(this.label4);
            this.Controls.Add(this.label3);
            this.Controls.Add(this.btn_yenile_yapilan);
            this.Controls.Add(this.label2);
            this.Controls.Add(this.dataGridView2);
            this.Controls.Add(this.btn_bitir);
            this.Controls.Add(this.btn_basla);
            this.Controls.Add(this.btn_yenile_yapilmis);
            this.Controls.Add(this.label1);
            this.Controls.Add(this.dataGridView1);
            this.Name = "Form1";
            ((System.ComponentModel.ISupportInitialize)(this.dataGridView1)).EndInit();
            ((System.ComponentModel.ISupportInitialize)(this.dataGridView2)).EndInit();
            ((System.ComponentModel.ISupportInitialize)(this.dataGridView3)).EndInit();
            ((System.ComponentModel.ISupportInitialize)(this.dataGridView4)).EndInit();
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        /// Personel Listele Listeleme

        void listele_personel()
        {
            string sql = "select * from tbl_personel";
            dataGridView3.DataSource = crud.Listele(sql);
        }


        /// </summary>

        /// İş Listele Listeleme

        void listele_is()
        {
            string sql = "select * from tbl_hazir_isler";
            dataGridView4.DataSource = crud.Listele(sql);
        }

        /// </summary>

        /// Bitmiş İşler Listeleme

        void listele_yapilan()
        {
            string sql = "select kayit_id,prsnl_id_ref,is_id_ref,kayit_baslangic from tbl_is_kayit where kayit_bitis IS NULL Order By kayit_id ASC";
            dataGridView2.DataSource = crud.Listele(sql);
        }

        private void btn_yenile_yapilan_Click(object sender, EventArgs e)
        {
            listele_yapilan();
        }
       
        /// </summary>

        /// Bitmiş İşler Listeleme

        void listele_bitmis()
        {
            string sql = "select kayit_id,prsnl_id_ref,is_id_ref,kayit_baslangic,kayit_bitis from tbl_is_kayit where kayit_bitis IS NOT NULL Order By kayit_id DESC";
            dataGridView1.DataSource = crud.Listele(sql);
        }

        private void btn_yenile_Click(object sender, EventArgs e)
        {
            listele_bitmis();
        }


        /// </summary>
        /// 

        ///Başlatma
        private void btn_basla_Click(object sender, EventArgs e)
        {
            int secili_personel = Convert.ToInt32(dataGridView3.CurrentRow.Cells["prsnl_id"].Value.ToString());
            int secili_is = Convert.ToInt32(dataGridView4.CurrentRow.Cells["is_id"].Value.ToString());
            if (MessageBox.Show(secili_personel+" Numaralı Personel "+secili_is+" Numaralı İşi Başlatıyor.  Onaylıyormusunuz ?", "Uyarı", MessageBoxButtons.YesNo, MessageBoxIcon.Question) == DialogResult.Yes)
            {
                DateTime tarih = DateTime.Now;
                string sql = "insert into tbl_is_kayit(prsnl_id_ref,is_id_ref,kayit_baslangic) Values ('" + secili_personel + "'," +
                    "'" + secili_is + "','" + tarih + "')";
                if (crud.islem(sql))
                {
                    MessageBox.Show("İş Başlatıldı");
                }
            }
               

        }


        ///Bitirme

        private void btn_bitir_Click(object sender, EventArgs e)
        {
            int yapilan_is = Convert.ToInt32(dataGridView2.CurrentRow.Cells["kayit_id"].Value.ToString());
            if (MessageBox.Show(yapilan_is+" Numaralı İş Bitilecek.  Onaylıyormusunuz ?" , "Uyarı",MessageBoxButtons.YesNo, MessageBoxIcon.Question) == DialogResult.Yes)
            {
                DateTime bitis_tarih = DateTime.Now;
                string sql = "Update tbl_is_kayit set kayit_bitis = '" + bitis_tarih + "' where kayit_id = '" + yapilan_is + "'";
                if (crud.islem(sql))
                {
                    MessageBox.Show("İş Bitirildi");
                }
            }

            
            
        }
    }
}
