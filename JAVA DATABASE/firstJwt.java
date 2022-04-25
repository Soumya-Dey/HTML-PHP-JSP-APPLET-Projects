import java.awt.*;
import java.sql.*;
import java.awt.event.*;
import javax.swing.*;

public class firstJwt extends JFrame implements ActionListener {
    JLabel cid, cname;
    JTextField id, name;
    JButton add, del, upd;
    JPanel panel;

    static Connection conn;
    static ResultSet res;
    static PreparedStatement pstmt;

    public firstJwt() {
        super("My Application");

        Container c = getContentPane();
        c.setLayout(new GridLayout(5, 10));

        cid = new JLabel("Customer Id", JLabel.CENTER);
        cname = new JLabel("Customer Name", JLabel.CENTER);
        id = new JTextField(10);
        name = new JTextField(20);
        add = new JButton("Add");
        del = new JButton("Delete");
        upd = new JButton("Update");
        panel = new JPanel();

        c.add(cid);
        c.add(id);
        c.add(cname);
        c.add(name);
        c.add(panel);

        panel.add(add);
        panel.add(upd);
        panel.add(del);
        add.addActionListener(this);
        upd.addActionListener(this);
        del.addActionListener(this);

        pack();
        setVisible(true);
        // addWindowListener(new WIN());
    }

    public static void main(String[] args) {
        new firstJwt();

        try {
            Class.forName("sun.jdbc.odbc.JdbcOdbcDriver").newInstance();
            conn = DriverManager.getConnection("jdbc:odbc:dsn");
            // stmt = conn.createStatement();
        } catch (Exception e) {
            System.out.println(e);
        }
    }

    public void actionPerformed(ActionEvent e) {
        try {
            if (e.getSource() == add) {
                String idInp = id.getText();
                String nameInp = name.getText();
                // pstmt = conn.prepareStatement("insert into emp values(?, ?)");
                // pstmt.setString(1, idInp);
                // pstmt.setString(2, nameInp);
                // pstmt.executeUpdate();

                System.out.println(idInp);
                System.out.println(nameInp);
            } else if (e.getSource() == upd) {
                String idInp = id.getText();
                String nameInp = name.getText();
                // pstmt = conn.prepareStatement("update emp set name = ? where emp.id = ?");
                // pstmt.setString(1, nameInp);
                // pstmt.setString(2, idInp);
                // pstmt.executeUpdate();

                System.out.println(idInp);
                System.out.println(nameInp);
            } else if (e.getSource() == del) {
                String idInp = id.getText();
                // pstmt = conn.prepareStatement("delete from emp where emp.id = ?");
                // pstmt.setString(1, idInp);
                // pstmt.executeUpdate();

                System.out.println(idInp);
            }
        } catch (Exception event) {
            System.out.println(event);
        }
    }

    // class WIN extends WindowAdapter {
    // public void windowClosing(WindowEvent w) {
    // JOptionPane jop = new JOptionPane();
    // jop.showMessageDialog(null, "Database", "Thanks",
    // JOptionPane.QUESTION_MESSAGE);
    // }

    // } // end of the class

}
