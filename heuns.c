#include <stdio.h>

// Function representing the differential equation dy/dx = f(x, y)
double f(double x, double y) {
    return 2 * x + y; // Example function: y' = 2x + y
}

// Heun's method to solve the differential equation
void heun(double x0, double y0, double h, double xn) {
    double x = x0;
    double y = y0;
    int steps = (int)((xn - x0) / h);

    printf("x\t\t y\n");
    printf("%.5f\t%.5f\n", x, y);

    for (int i = 1; i <= steps; i++) {
        double slope1 = f(x, y);
        double slope2 = f(x + h, y + h * slope1);
        y = y + (h / 2) * (slope1 + slope2);
        x = x + h;
        printf("%.5f\t%.5f\n", x, y);
    }
}

int main() {
    double x0, y0, xn, h;
    printf("THIS CODE IS RUN BY NIRJALA BHATTARAI.\n");

    // Input initial values, step size, and end point
    printf("Enter initial value of x: ");
    scanf("%lf", &x0);
    printf("Enter initial value of y: ");
    scanf("%lf", &y0);
    printf("Enter step size (h): ");
    scanf("%lf", &h);
    printf("Enter final value of x: ");
    scanf("%lf", &xn);

    // Apply Heun's method
    heun(x0, y0, h, xn);

    return 0;
}
