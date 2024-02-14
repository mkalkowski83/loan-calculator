<?php

declare(strict_types=1);

namespace LoanCalculator\Domain;
final readonly class Loan
{
    public function __construct(
        public int $id,
        public int $term,
        public int $interestRate,
        public int $amount,
    ) {
    }

    public function amountWithInterest(): float
    {
        return $this->amount * (($this->interestRate / 100) + 1);
    }

    public function monthlyInstallment(): float
    {
        return $this->amountWithInterest() / $this->term;
    }

    public function monthlyAmountWithoutInterest() : float
    {
        return $this->amount / $this->term;
    }

    public function monthlyAmountInterest(): float
    {
        return $this->monthlyInstallment() - $this->monthlyAmountWithoutInterest();
    }
}