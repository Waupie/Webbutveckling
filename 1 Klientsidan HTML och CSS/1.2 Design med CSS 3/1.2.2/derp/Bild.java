package com.company;

import java.awt.*;

public class Bild {
    private int x, y, width, height, radie = 20;
    private Image img;
    private Color c = new Color((int)(Math.random() * 0x1000000));

    public Bild(Image img, int x, int y) {
        this.img = img;
        this.x = x;
        this.y = y;
        this.width = img.getWidth(null);
        this.height = img.getHeight(null);
    }

    public void draw(Graphics g) {

        //g.setColor(c);
        //g.fillRect(x - radie, y - radie, radie * 2, radie * 2);

        g.drawImage(img, x - width/2, y - height/2, null);
    }

    public void flytta(Graphics g, int x, int y) {
        this.x = x;
        this.y = y;
        draw(g);
    }

    public static final int sqr(int x) {
        return x * x;
    }

    public boolean rymmer(int x, int y) {
        return sqr(this.x - x) + sqr(this.y - y) <= sqr(radie + radie);
    }

    public Image getImg() {
        return img;
    }

}
