describe('Admin Middleware', () => {
  const testCases: [string, string, number][] = [
    ['shows admin views to permitted user', 'admin@test.com', 200],
    ['shows admin views not found to non-permitted user', 'user@test.com', 404],
  ];

  for (const [description, email, status] of testCases) {
    it(description, () => {
      cy.login({ email });

      cy.request({
        url: '/admin',
        method: 'GET',
        failOnStatusCode: false,
      })
        .its('status')
        .should('eq', status);
    });
  }
});
