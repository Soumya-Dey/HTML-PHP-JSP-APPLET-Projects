import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import javax.swing.JButton;
import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JTextField;

class Calculator extends JFrame implements ActionListener {
    JButton addBtn, sumBtn, mulBtn, divBtn, clrBtn;
    JTextField num1TextField, num2TextField;
    JLabel num1Label, num3Label, resultLabel;

    Calculator() {
        setDefaultCloseOperation(EXIT_ON_CLOSE);

        num1Label = new JLabel("Enter Number 1 :");
        num1Label.setBounds(25, 25, 150, 20);

        num3Label = new JLabel("Enter Number 2 :");
        num3Label.setBounds(25, 70, 150, 20);

        num1TextField = new JTextField();
        num1TextField.setBounds(209, 30, 150, 20);

        num2TextField = new JTextField();
        num2TextField.setBounds(209, 80, 150, 20);

        resultLabel = new JLabel("Result = ");
        resultLabel.setBounds(110, 140, 150, 30);

        addBtn = new JButton("Add(+)");
        addBtn.setBounds(30, 200, 100, 25);

        sumBtn = new JButton("Sub(-)");
        sumBtn.setBounds(140, 200, 70, 25);

        mulBtn = new JButton("Mul(*)");
        mulBtn.setBounds(220, 200, 70, 25);

        divBtn = new JButton("Div(/)");
        divBtn.setBounds(300, 200, 70, 25);

        clrBtn = new JButton("Clear");
        clrBtn.setBounds(110, 250, 150, 25);

        add(num1Label);
        add(num3Label);
        add(num1TextField);
        add(num2TextField);
        add(resultLabel);

        add(addBtn);
        add(sumBtn);
        add(mulBtn);
        add(divBtn);
        add(clrBtn);

        addBtn.addActionListener(this);
        sumBtn.addActionListener(this);
        mulBtn.addActionListener(this);
        divBtn.addActionListener(this);
        clrBtn.addActionListener(this);

        setLayout(null);
        setSize(450, 350);
        setVisible(true);
    }

    public void actionPerformed(ActionEvent e) {
        int a = Integer.parseInt(num1TextField.getText());
        int b = Integer.parseInt(num2TextField.getText());

        if (e.getSource().equals(addBtn)) 
            resultLabel.setText("Result = " + String.valueOf(a + b));

        if (e.getSource().equals(sumBtn)) 
            resultLabel.setText("Result = " + String.valueOf(a - b));

        if (e.getSource().equals(mulBtn)) 
            resultLabel.setText("Result = " + String.valueOf(a * b));

        if (e.getSource().equals(divBtn)) {
            if(b == 0) resultLabel.setText("DIVISION BY ZERO!");
            else resultLabel.setText("Result = " + String.valueOf(a / b));
        }

        if (e.getSource().equals(clrBtn)) {
            num2TextField.setText("");
            num1TextField.setText("");
            resultLabel.setText("Result = ");
        }

    }

    public static void main(String args[]) {
        Calculator t = new Calculator();
    }
}