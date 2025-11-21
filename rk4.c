#include <stdio.h>

// Function representing the differential equation dy/dx = f(x, y)
double f(double x, double y) {
    return 2 * x + y; // Example function: y' = 2x + y
}

// RK4 method to solve the differential equation
void rk4(double x0, double y0, double h, double xn) {
    double x = x0;
    double y = y0;
    int steps = (int)((xn - x0) / h);

    printf("x\t\t y\n");
    printf("%.5f\t%.5f\n", x, y);

    for (int i = 1; i <= steps; i++) {
        double k1 = h * f(x, y);
        double k2 = h * f(x + h / 2, y + k1 / 2);
        double k3 = h * f(x + h / 2, y + k2 / 2);
        double k4 = h * f(x + h, y + k3);
        y = y + (k1 + 2 * k2 + 2 * k3 + k4) / 6;
        x = x + h;
        printf("%.5f\t%.5f\n", x, y);
    }
}

int main() {
    double x0, y0, xn, h;
    printf("THIS CODE IS DONE BY NIRJALA BHATTARAI.\n");
    

    // Input initial values, step size, and end point
    printf("Enter initial value of x: ");
    scanf("%lf", &x0);
    printf("Enter initial value of y: ");
    scanf("%lf", &y0);
    printf("Enter step size (h): ");
    scanf("%lf", &h);
    printf("Enter final value of x: ");
    scanf("%lf", &xn);

    // Apply RK4 method
    rk4(x0, y0, h, xn);

    return 0;
}
