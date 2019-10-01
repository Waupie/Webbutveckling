package com.company;

import java.awt.event.MouseAdapter;
import java.awt.event.MouseEvent;
import java.awt.event.MouseMotionListener;

public class Muslyssnare extends MouseAdapter implements MouseMotionListener {
    Ritpanel ritpanel;
    Bild valdBild;

    public Muslyssnare(Ritpanel ritpanel) {
        this.ritpanel = ritpanel;
    }

    @Override
    public void mouseClicked(MouseEvent e) {
        super.mouseClicked(e);
        int x = e.getX();
        int y = e.getY();

        //ritpanel.addBild(new Bild(x, y));

        valdBild = ritpanel.hittaBild(x, y);

        if (valdBild == null) {
            System.out.println("Nothing at (" + x + "," + y + ")");
        } else {
            ritpanel.sättÖverst(valdBild);
        }


    }

    @Override
    public void mousePressed(MouseEvent e) {
        super.mousePressed(e);
        int x = e.getX();
        int y = e.getY();

        valdBild = ritpanel.hittaBild(x, y);

        if (valdBild == null) {
            System.out.println("Nothing at (" + x + "," + y + ")");
        } else {
            //valdBild = new Bild(valdBild.getImg(), x, y);
            ritpanel.sättÖverst(valdBild);
        }

    }

    @Override
    public void mouseDragged(MouseEvent e) {
        super.mouseDragged(e);
        int x = e.getX();
        int y = e.getY();

        ritpanel.flyttaBild(valdBild, x, y);
    }
}
