@displaying_sponsors
Feature: Displaying sponsors in the Store
    In order to promote sponsors of SyliusDays
    As a visitor
    I want to see the list of sponsors

    Background:
        Given the store operates on a single channel in "United States"
        And channel "United States" uses "sylius/mannheim-theme" theme
        And there is a sponsor named "Sylius" with "https://sylius.com" url and "logo-bitexpert.svg" logo
        And there is a sponsor named "BitExpert" with "https://www.bitexpert.de" url and "logo-bitexpert.svg" logo

    @ui
    Scenario:
        When I visit this channel's homepage
        Then I should see the list of sponsors
        And I should see "sylius" sponsor
        And I should see "bitexpert" sponsor
