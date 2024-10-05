package EJERCICIO4;

import java.io.IOException;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

@WebServlet("/EJERCICIO4")
public class EJERCICIO4 extends HttpServlet {
    private static final long serialVersionUID = 1L;

    protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
        String catastroId = request.getParameter("catastroId");
        String tipoImpuesto = "";

        if (catastroId != null && !catastroId.isEmpty()) {
            char primerDigito = catastroId.charAt(0);

            // Determinar el tipo de impuesto
            switch (primerDigito) {
                case '1':
                    tipoImpuesto = "Alto";
                    break;
                case '2':
                    tipoImpuesto = "Medio";
                    break;
                case '3':
                    tipoImpuesto = "Bajo";
                    break;
                default:
                    tipoImpuesto = "Desconocido";
                    break;
            }
        }

        // Devolver el tipo de impuesto como respuesta
        response.setContentType("text/plain");
        response.getWriter().write(tipoImpuesto);
    }
}
