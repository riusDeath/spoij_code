
import java.util.*;
public class bai21_2 {
	public static void main(String args[]) {
		int n;
		long F[] = new long[100];
		n = Integer.parseInt(args[0]);
		F[1]=1;
		F[2]=1;
		for(int i = 3; i <= 92; i++) {
			F[i] = F[i-1] + F[i-2];
		}
        int index = 1;
		while (n-->0) {
			int test = Integer.parseInt(args[index]);
			System.out.print(F[test]+" ");
                        index++;
		}
	}
}



