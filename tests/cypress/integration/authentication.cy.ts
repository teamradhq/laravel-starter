describe('Authentication', () => {
  const testCases: [string, string, string][] = [
    ['logs a valid user in', 'admin@test.com', '/dashboard'],
    ['does not log invalid user in', 'invalid@test.com', '/login'],
  ];

  for (const [description, email, path] of testCases) {
    it(description, () => {
      cy.visit('/login');

      cy.get('input[name="email"]').type(email);
      cy.get('input[name="password"]').type('password');
      cy.get('#login-button').click();

      cy.location().should((location) => {
        expect(location.pathname).to.eq(path);
      });
    });
  }
});
