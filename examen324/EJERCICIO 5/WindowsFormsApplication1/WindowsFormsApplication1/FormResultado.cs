using System;
using System.Data.SqlClient;
using System.Windows.Forms;

namespace WindowsFormsApplication1
{
    public partial class FormResultado : Form
    {
        private int idCatastro;

        public FormResultado(int id)
        {
            InitializeComponent();
            idCatastro = id;
            MostrarTipoImpuesto();
        }

        private void MostrarTipoImpuesto()
        {
            // Conexión a la base de datos
   // Ajusta la cadena de conexión según tu configuración
            string connectionString = "Data Source=WINDOS7;Initial Catalog=BDHansel;Integrated Security=True";
            using (SqlConnection connection = new SqlConnection(connectionString))
            {
                connection.Open();
                string query = "SELECT id FROM Catastro WHERE id = @id";
                SqlCommand command = new SqlCommand(query, connection);
                command.Parameters.AddWithValue("@id", idCatastro);

                SqlDataReader reader = command.ExecuteReader();
                if (reader.Read())
                {
                    int codigoCatastral = (int)reader["id"];
                    string tipoImpuesto;

                    // Determinar el tipo de impuesto
                    if (codigoCatastral.ToString().StartsWith("1"))
                    {
                        tipoImpuesto = "Alto";
                    }
                    else if (codigoCatastral.ToString().StartsWith("2"))
                    {
                        tipoImpuesto = "Medio";
                    }
                    else if (codigoCatastral.ToString().StartsWith("3"))
                    {
                        tipoImpuesto = "Bajo";
                    }
                    else
                    {
                        tipoImpuesto = "Desconocido";
                    }

                    lblResultado.Text = "Tipo de Impuesto: " + tipoImpuesto;
                }
                else
                {
                    lblResultado.Text = "No se encontró el ID catastral.";
                }
            }
        }

        private void btnLogout_Click(object sender, EventArgs e)
        {
            // Cerrar el formulario de resultado y mostrar el formulario de login
            FormLogin loginForm = new FormLogin();
            loginForm.Show();
            this.Close();
        }
    }
}
