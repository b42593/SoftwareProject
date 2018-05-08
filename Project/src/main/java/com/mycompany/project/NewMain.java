/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.mycompany.project;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.Statement;

/**
 *
 * @author Elly
 */
public class NewMain {

    public static void main(String[] args) {
        //connectAndRetrieve();
        connectAndRetrieve();
    }

    public static void connectAndRetrieve()
    {
        try
        {
            //connect
            Connection con = DriverManager.getConnection
               ("jdbc:mysql://localhost:8084/booking", "root", "");

            //make a query
            Statement stmt = con.createStatement();
            //ResultSet rs = stmt.executeQuery("Select customer.id, customer.name, customer.surname, customer.mobileNo, customer.username, customer.password, customer.email from customer");
            ResultSet rs = stmt.executeQuery("Select * from customer");

            //output result
            while (rs.next())
            {
                System.out.println(rs.getInt(1) +"\t" +
                                   rs.getString(2) +"\t" +
                                   rs.getString(3) +"\t" +
                                   rs.getInt(4) +"\t" +
                                   rs.getString(5) +"\t" +
                                   rs.getString(6) + "\t" +
                                   rs.getString(7));
            }

            //close connection
            con.close();
        }
        catch (Exception e)
        {
            e.printStackTrace();
        }
    }

    public static void connectAndInsert()
    {
        try
        {
            //connect
            Connection con = DriverManager.getConnection
               ("jdbc:mysql://localhost:8084/booking", "root", "");

            //make a query
            Statement stmt = con.createStatement();
            //stmt.executeUpdate("Insert into products (name, price, category) values ('water', 0.80, 3)");
            //stmt.executeUpdate("Delete from products where name='Water'");
            //stmt.executeUpdate("Update products set price=3 where name='Spaghetti'");

            //close connection
            con.close();
        }
        catch (Exception e)
        {
            e.printStackTrace();
        }
    }
}
