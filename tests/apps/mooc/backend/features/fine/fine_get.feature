Feature: Welcome user
  Display welcome user with date

  Scenario: Display user send by GET
    Given I send a GET request to "/fine/jesus"
    Then the response content should be:
    """
    {
      "name": "Everything is fine jesus",
      "date": "2021-06-20 10:00:00"
    }
    """
