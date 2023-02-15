namespace Proyecto0029
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }

        private void label3_Click(object sender, EventArgs e)
        {

        }

        private void button1_Click(object sender, EventArgs e)
        {
            String nombre = cajatexto1.Text;
            String apellidos = cajatexto2.Text;

            String unido = nombre + " " + apellidos;

            etiqueta1.Text = unido;
        }
    }
}