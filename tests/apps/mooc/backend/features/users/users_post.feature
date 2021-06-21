Feature: Create a new user
  In order to have users on the platform
  As a user
  I want to create an account

  Scenario: A valid non existing course
    Given I send a POST request to "/users" with body:
    """
    {
      "name": "Jesus",
      "email": "jesus@mail.com"
    }
    """
    Then the response status code should be 201
    And the response should be empty
