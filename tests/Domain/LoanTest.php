<?php
declare(strict_types=1);

namespace LoanCalculator\Test\Domain;

use LoanCalculator\Domain\Loan;
use PHPUnit\Framework\TestCase;

final class LoanTest extends TestCase
{
    /**
     * @test
     */
    public function should_calculate_amount_with_interest(): void
    {
        //Given
        $loan = new Loan(1, 12, 5, 1000);
        $expectedAmountWithInterest = 1050;

        //When
        $amountWithInterest = $loan->amountWithInterest();

        //Then
        $this->assertEquals($expectedAmountWithInterest, $amountWithInterest);
    }
}
