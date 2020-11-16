package DB;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;


public class Week11 {

	private static String className = "oracle.jdbc.driver.OracleDriver";
	private static String url = "jdbc:oracle:thin:@localhost:1521:xe";
	private static String user = "hr";
	private static String password = "1234";
	
	public Connection getConnection() {
		Connection conn = null;
		
		try {			
			Class.forName(className);
			conn = DriverManager.getConnection(url, user, password);
			System.out.println("connection success");
			conn.close();
		} catch (ClassNotFoundException cnfe) {
			System.out.println("failed db driver loading\n" + cnfe.toString());
		} catch (SQLException sqle) {
			System.out.println("failed db connection\n" + sqle.toString());
		} catch (Exception e) {
			System.out.println("Unknown error");
			e.printStackTrace();
		}	
		
		return conn;
	}
	

	public void closeAll(Connection conn, PreparedStatement pstm, ResultSet rs) {
		try {
			if (rs != null) rs.close();
			if (pstm != null) pstm.close();
			if (conn != null) conn.close();
			System.out.println("All closed");
		} catch (SQLException sqle) {
			System.out.println("Error !!!");
			sqle.printStackTrace();
		}
	}
	
	private void select() {
		Connection conn = null;
		PreparedStatement pstm = null;
		ResultSet rs = null;
		String sql = "select * from ( select * from DEPARTMENTS order by rownum desc ) where rownum = 1";		
		try {
			conn = this.getConnection();
			pstm = conn.prepareStatement(sql);
			rs = pstm.executeQuery();	
			int count = 0;
			while(rs.next()) {
				System.out.print("\ndepartment_id: " + rs.getString("department_id"));
				System.out.print("\tdepartment_name: " + rs.getString("department_name"));
				System.out.println("\tlocation_id: " + rs.getString("location_id"));
				count = count + 1;
			}			
			System.out.println(count + " row selected\n");									
		} catch (SQLException e) {
			e.printStackTrace();
		} finally {
			this.closeAll(conn, pstm, rs);			
		}
	}

	

	private void update() {
		Connection conn = null;
		PreparedStatement pstm = null;		
		String sql = "update DEPARTMENTS set location_id = 1500 where department_id = 270";		
		try {
			conn = this.getConnection();
			pstm = conn.prepareStatement(sql);
			int count = pstm.executeUpdate();
			System.out.println(count + " row updated");			
		} catch (SQLException e) {
			e.printStackTrace();
		} finally {
			this.closeAll(conn, pstm, null);			
		}
	}

	
	private void insert() {
		Connection conn = null;
		PreparedStatement pstm = null;		
		String sql = "insert into DEPARTMENTS values (271, 'CC', NULL, '1600')";
		
		try {
			conn = this.getConnection();
			pstm = conn.prepareStatement(sql);
			int count = pstm.executeUpdate();
			System.out.println(count + " row inserted");			
		} catch (SQLException e) {
			e.printStackTrace();
		} finally {
			this.closeAll(conn, pstm, null);			
		}
	}



	
	private void delete() {
		Connection conn = null;
		PreparedStatement pstm = null;		
		String sql = "delete from DEPARTMENTS where where department_id = 271";		
		try {
			conn = this.getConnection();
			pstm = conn.prepareStatement(sql);
			int count = pstm.executeUpdate();
			System.out.println(count + " row deleted");			
		} catch (SQLException e) {
			e.printStackTrace();
		} finally {
			this.closeAll(conn, pstm, null);			
		}
	}	
	
	public static void main(String[] args) {
		Week11 so = new Week11();		
		so.select();
		so.insert();
		so.select();
		so.update();
		so.select();
		so.delete();
		so.select();
	}
}


