package com.company;

import javax.swing.*;

public class Main extends JFrame {

    public Main() {
        super("Uppgift 3");
        JPanel panel = new Ritpanel();
        add(panel);

        setSize(400, 400);
        setResizable(false);
        setDefaultCloseOperation(EXIT_ON_CLOSE);
        setVisible(true);
    }

    public static void main(String[] args) {
        new Main();
    }
}
