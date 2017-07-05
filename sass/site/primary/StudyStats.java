import java.util.Scanner;
import java.io.File;
import java.io.FileNotFoundException;

public class StudyStats {
  public static final int MAX = 5000;
  
  static String[] months = new String[MAX];
  static int[] days = new int[MAX];
  static int[] start = new int[MAX];
  static int[] stop = new int[MAX];
  static String[] activities = new String[MAX];
  static String[] locations = new String[MAX];
  static int n=0;
  
  // INPUT: time in military format
  // OUTPUT: returns number of minutes from midnight to time
  public static int timeInMins(int time) {
    // your code here
    return 0;
  }
  
  // INPUT: start and stop in military format
  // OUTPUT: returns number of total minutes from start to stop
  public static int entryMins(int start, int stop) {
    // your code here
    return 0;
  }
  
  // INPUT: uses arrays start and stop previously filled by file
  // OUTPUT: returns the average study time in minutes among entries
  public static double aveStudyMins() {
    // your code here
    return 0;
  }
  
  // INPUT: uses arrays start and stop previously filled by file
  // OUTPUT: returns the array index of the entry with the maximum minutes studying
  public static int maxStudyTimeEntry() {
    // your code here
    return 0;
  }
  
  public static void printEntry(int k) {
    System.out.print( months[k] + " " );
      System.out.print( days[k] + " " );
      System.out.printf("%04d ", start[k]);
      System.out.printf("%04d ", stop[k]);
      System.out.print( activities[k] + " " );
      System.out.println( locations[k] );
  }
  
  public static void main(String[] args) throws FileNotFoundException {
    File inF = new File("study_log.txt");
    Scanner inputF = new Scanner(inF);
    
    while (inputF.hasNextLine()) {
      months[n] = inputF.next();
      days[n] = inputF.nextInt();
      start[n] = inputF.nextInt();
      stop[n] = inputF.nextInt();
      activities[n] = inputF.next();
      locations[n] = inputF.next();
      
      printEntry(n);
      
      n++;
    }
    System.out.println();
    
    double ave = aveStudyMins();
    System.out.println("Your average study session in minutes is: " + ave);
    int k = maxStudyTimeEntry();
    System.out.println("Your maximum time study session was:");
    printEntry(k);
  }
  
}