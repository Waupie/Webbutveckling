package com.company;

import javax.swing.*;
import java.awt.*;
import java.util.ArrayList;

public class Ritpanel extends JPanel {
    ArrayList<Bild> bilder = new ArrayList<>();
    ArrayList<Image> images = new ArrayList<>();
    boolean hasPaintedPictures = false;
    ImageIcon[] icons = {
            new ImageIcon("blab.gif"),  // 1
            new ImageIcon("gira.gif"),  // 2
            new ImageIcon("katt.gif"),  // 3
            new ImageIcon("pear.gif"),  // 4
            new ImageIcon("peli.gif"),  // 5
            new ImageIcon("stef.gif"),  // 6
            new ImageIcon("stru.gif")   // 7
    };



    public Ritpanel() {
        Muslyssnare ml = new Muslyssnare(this);
        addMouseListener(ml);
        addMouseMotionListener(ml);


        Image imgimg = icons[5].getImage();/*
        bilder.add(new Bild(imgimg,20, 20));
        bilder.add(new Bild(imgimg,40, 40));
        bilder.add(new Bild(imgimg,60, 60));
        bilder.add(new Bild(imgimg,80, 80));
        bilder.add(new Bild(imgimg, 100, 100));
*/
        addBild(new Bild(imgimg,20, 20));
        addBild(new Bild(imgimg,40, 40));




    }

    public void addBild(Bild b) {
        bilder.add(b);

        Graphics g = getGraphics();
        b.draw(g);
    }

    public Bild hittaBild(int x, int y) {
        for (Bild b : bilder) {
            if (b.rymmer(x, y))
                return b;
        }
        return null;
    }

    public void flyttaBild(Bild b, int x, int y) {
        b.flytta(getGraphics(), x, y);
        repaint();
    }

    public void sättÖverst(Bild b) {
        int itemPos = bilder.indexOf(b);
        bilder.remove(itemPos);
        bilder.add(b);
        //System.out.println(b.getBildNr() + " är nu nummer " + bilder.indexOf(b));
        repaint();
    }

    @Override
    protected void paintComponent(Graphics g) {
        super.paintComponent(g);



       // bilder.add(new Bild(abc, 210, 210));

        for (Bild b : bilder) {
            b.draw(g);
        }

    }
}
