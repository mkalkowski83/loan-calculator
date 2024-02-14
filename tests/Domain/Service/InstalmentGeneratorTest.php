<?php
declare(strict_types=1);

namespace LoanCalculator\Test\Domain\Service;

use LoanCalculator\Domain\Installment;
use LoanCalculator\Domain\Loan;
use LoanCalculator\Domain\Service\InstalmentGenerator;
use PHPUnit\Framework\TestCase;

class InstalmentGeneratorTest extends TestCase
{
    /**
     * @test
     */
    public function it_should_generate_instalments(): void
    {
        // Given
        $loan = new Loan(1, 5, 5, 1000);
        $instalmentGenerator = new InstalmentGenerator();
        // When
        $instalments = $instalmentGenerator->generate($loan);

        // Then
        $this->assertCount(5, $instalments);
        $this->assertEquals([
            new Installment(1, 210, 200, 10,840),
            new Installment(2, 210, 400, 20, 630),
            new Installment(3, 210, 600, 30, 420),
            new Installment(4, 210, 800, 40, 210),
            new Installment(5, 210, 1000, 50, 0),
        ], $instalments);
    }
}
