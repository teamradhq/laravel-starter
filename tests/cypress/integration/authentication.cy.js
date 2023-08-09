describe('Authentication', () => {
    it('logs a user in', () => {
        cy.visit('/login');

        cy.get('input[name="email"]').type('admin@test.com');
        cy.get('input[name="password"]').type('password');
        cy.get('[type="submit"]').click();

        cy.location().should((location) => {
            expect(location.pathname).to.eq('/dashboard');
        });
    });
});
