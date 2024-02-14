<?php
declare(strict_types=1);

namespace LoanCalculator\Domain;

final readonly class Installment
{
    public function __construct(
        public int   $month,
        public float $amount,
        public float $interestPaid,
        public float $principalPaid,
        public float $amountAfterPay,
    ) {
    }
}