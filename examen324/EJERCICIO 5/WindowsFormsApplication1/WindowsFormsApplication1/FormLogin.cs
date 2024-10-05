using System;
using System.Data.SqlClient;
using System.Windows.Forms;

namespace WindowsFormsApplication1
{
    public partial class FormLogin : Form
    {
        public FormLogin()
        {
            InitializeComponent();
        }

        private void btnLogin_Click(object sender, EventArgs e)
        {
            string ci = txtCi.Text;

            // Conexión a la base de datos
            string connectionString = "Data Source=WINDOS7;Initial Catalog=BDHansel;Integrated Security=True"; // Ajusta la cadena de conexión según tu configuración

            using (SqlConnection connection = new SqlConnection(connectionString))
            {
                connection.Open();
                string query = "SELECT id FROM Catastro WHERE ci_persona = @ci";
                SqlCommand command = new SqlCommand(query, connection);
                command.Parameters.AddWithValue("@ci", ci);

                object result = command.ExecuteScalar();
                if (result != null)
                {
                    int idCatastro = (int)result;
                    FormResultado resultadoForm = new FormResultado(idCatastro);
                    resultadoForm.Show();
                    this.Hide(); // Ocultar el formulario de login
                }
                else
                {
                    MessageBox.Show("CI no encontrado. Por favor, inténtelo de nuevo.");
                }
            }
        }
    }
}
