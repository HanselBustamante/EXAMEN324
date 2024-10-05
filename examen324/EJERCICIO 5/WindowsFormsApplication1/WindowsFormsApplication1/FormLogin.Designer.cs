namespace WindowsFormsApplication1
{
    partial class FormLogin
    {
        private System.ComponentModel.IContainer components = null;

        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        private void InitializeComponent()
        {
            this.lblCi = new System.Windows.Forms.Label();
            this.txtCi = new System.Windows.Forms.TextBox();
            this.btnLogin = new System.Windows.Forms.Button();
            this.SuspendLayout();
            // 
            // lblCi
            // 
            this.lblCi.AutoSize = true;
            this.lblCi.Location = new System.Drawing.Point(20, 20);
            this.lblCi.Name = "lblCi";
            this.lblCi.Size = new System.Drawing.Size(81, 13);
            this.lblCi.TabIndex = 0;
            this.lblCi.Text = "Ingrese su CI:";
            // 
            // txtCi
            // 
            this.txtCi.Location = new System.Drawing.Point(20, 50);
            this.txtCi.Name = "txtCi";
            this.txtCi.Size = new System.Drawing.Size(200, 20);
            this.txtCi.TabIndex = 1;
            // 
            // btnLogin
            // 
            this.btnLogin.Location = new System.Drawing.Point(20, 80);
            this.btnLogin.Name = "btnLogin";
            this.btnLogin.Size = new System.Drawing.Size(100, 30);
            this.btnLogin.TabIndex = 2;
            this.btnLogin.Text = "Iniciar Sesión";
            this.btnLogin.UseVisualStyleBackColor = true;
            this.btnLogin.Click += new System.EventHandler(this.btnLogin_Click);
            // 
            // FormLogin
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(250, 130);
            this.Controls.Add(this.btnLogin);
            this.Controls.Add(this.txtCi);
            this.Controls.Add(this.lblCi);
            this.Name = "FormLogin";
            this.Text = "Iniciar Sesión";
            this.ResumeLayout(false);
            this.PerformLayout();
        }

        private System.Windows.Forms.Label lblCi;
        private System.Windows.Forms.TextBox txtCi;
        private System.Windows.Forms.Button btnLogin;
    }
}
