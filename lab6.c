#include <stdio.h>
#include <math.h>

#define MAX_SIZE 20 // Maximum size of the grid
#define MAX_ITER 1000 // Maximum number of iterations
#define EPSILON 1e-5 // Convergence criterion

void printGrid(double grid[MAX_SIZE][MAX_SIZE], int size) {
    for (int i = 0; i < size; i++) {
        for (int j = 0; j < size; j++) {
            printf("%.2f\t", grid[i][j]);
        }
        printf("\n");
    }
    printf("\n");
}

int main() {
    int size_x, size_y;
    double bottom_value, top_value, initial_value;
    printf("THIS CODE IS DONE BY NIRJALA BHATTARAI.\n");

    // Input parameters
    printf("Enter number of steps in x direction: ");
    scanf("%d", &size_x);
    printf("Enter number of steps in y direction: ");
    scanf("%d", &size_y);
    printf("Enter value on bottom side: ");
    scanf("%lf", &bottom_value);
    printf("Enter value on top side: ");
    scanf("%lf", &top_value);
    printf("Enter initial grid value: ");
    scanf("%lf", &initial_value);

    if (size_x <= 0 || size_y <= 0 || size_x > MAX_SIZE || size_y > MAX_SIZE) {
        printf("Invalid grid size.\n");
        return 1;
    }

    double grid[MAX_SIZE][MAX_SIZE];
    double tempGrid[MAX_SIZE][MAX_SIZE];
    
    // Initialize grid
    for (int i = 0; i < size_x; i++) {
        for (int j = 0; j < size_y; j++) {
            grid[i][j] = initial_value;
        }
    }

    // Boundary conditions
    for (int i = 0; i < size_x; i++) {
        grid[i][0] = bottom_value; // Left boundary
        grid[i][size_y - 1] = top_value; // Right boundary
    }

    // Gauss-Seidel Iteration
    int iter = 0;
    double diff = EPSILON + 1;
    while (iter < MAX_ITER && diff > EPSILON) {
        diff = 0.0;
        for (int i = 1; i < size_x - 1; i++) {
            for (int j = 1; j < size_y - 1; j++) {
                tempGrid[i][j] = 0.25 * (grid[i-1][j] + grid[i+1][j] + grid[i][j-1] + grid[i][j+1]);
                diff = fmax(diff, fabs(tempGrid[i][j] - grid[i][j]));
                grid[i][j] = tempGrid[i][j];
            }
        }
        iter++;
    }

    printf("Initial grid:\n");
    printGrid(grid, size_x);

    printf("Grid after 1 iteration:\n");
    printGrid(grid, size_x);

    printf("Final grid after %d iterations:\n", iter);
    printGrid(grid, size_x);

    return 0;
}
