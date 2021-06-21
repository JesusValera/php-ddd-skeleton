Feature: Create a new course
  In order to have courses on the platform
  As a user with admin permissions
  I want to create new course

  Scenario: A valid non existing course
    Given I send a PUT request to "/courses/7F4D77C5-6D68-4D35-BDA6-B0C171F2F3FD" with body:
    """
    {
      "name": "The best course",
      "duration": "5 hours"
    }
    """
    Then the response status code should be 201
    And the response should be empty
