

import java.util.Scanner;

public class Bai5 {
    private static int mod = (int) (1e9 + 7);
    private static long binPow(int a, int b) {
        long x = 1, y = a;
        while(b > 0) {
            if(b % 2 != 0) {
                x = (x * y)%mod;
            }
            y = (y * y)%mod;
            b >>= 1;
        }
        return x%mod;
    }
    private static long inverserEuler(int n) {
        return binPow(n, mod - 2);
    }
    private static long C(int k, int n){
        long f[] = new long[n + 1];
        for(int i = 0; i <= n; i++) f[i] = 1;
        for(int i = 2; i <= n; i++) f[i] = (f[i - 1] * i)%mod;
        return (f[n] * ((inverserEuler((int) f[k]) * inverserEuler((int) f[n-k]))%mod)%mod)%mod;
    }
    public static void main(String[] args) {
        int st, n, k;
        // Scanner sc = new Scanner(System.in);
        // st = sc.nextInt();
        st = Integer.parseInt(args[0]);
        int index = 1 ;
        while(st > 0) {
            st --;
            n = Integer.parseInt(args[index]);
            index++;
            k = Integer.parseInt(args[index]);
            index++;
            System.out.println(C(k, n));
        }
    }
}
