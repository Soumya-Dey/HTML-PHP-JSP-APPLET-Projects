import java.awt.*;
import java.awt.event.*;
import java.sql.*;
import javax.swing.*;

public class jwtPractice extends JFrame implements ActionListener {
    JLabel idLabel = new JLabel("Id");
    JLabel nameLabel = new JLabel("Name");
    JTextField id = new JTextField(10);
    JTextField name = new JTextField(20);
    JButton add = new JButton("add");
    JButton update = new JButton("update");
    JButton remove = new JButton("remove");
    JPanel p = new JPanel();
    Container c = null;

    public jwtPractice() {
        setDefaultCloseOperation(EXIT_ON_CLOSE);
        setLocation(250, 150);

        c = getContentPane();
        c.setLayout(new GridLayout(5, 10));

        c.add(idLabel);
        c.add(id);
        c.add(nameLabel);
        c.add(name);
        c.add(p);
        p.add(add);
        p.add(update);
        p.add(remove);

        add.addActionListener(this);
        update.addActionListener(this);
        remove.addActionListener(this);

        pack();
        setVisible(true);
    }

    public static void main(String[] args) {
        new jwtPractice();
    }

    public void actionPerformed(ActionEvent event) {
        try {
            // Class.forName("sun.jdbc.odbc.JdbcOdbcDriver").newInstance();
            // Connection conn = DriverManager.getConnection("jdbc:odbc:dsn");
            int idValue = Integer.parseInt(id.getText());
            int nameValue = Integer.parseInt(name.getText());

            if (event.getSource().equals(add)) {
                idLabel.setText("Add");
                c.setBackground(Color.YELLOW);
                name.setText(String.valueOf(idValue + nameValue));
            } else if (event.getSource().equals(update)) {
                idLabel.setText("Update");
                c.setBackground(Color.GREEN);
                name.setText(String.valueOf(idValue - nameValue));
            } else if (event.getSource().equals(remove)) {
                idLabel.setText("Remove");
                c.setBackground(Color.ORANGE);
                name.setText(String.valueOf(idValue * nameValue));
            }
            c.repaint();
        } catch (Exception e) {
            System.out.println(e);
        }
    }
}