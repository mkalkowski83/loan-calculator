<?php
declare(strict_types=1);

namespace LoanCalculator\Domain\Service;

use LoanCalculator\Domain\Installment;
use LoanCalculator\Domain\Loan;

final class InstalmentGenerator
{

    public function generate(Loan $loan): array
    {
        $instalments = [];
        $amountWithInterest = $loan->amountWithInterest();
        $instalment = $amountWithInterest / $loan->term;
        for ($month = 1; $month <= $loan->term; $month++) {
            $instalments[] = new Installment(
                $month,
                $instalment,
                $loan->monthlyAmountWithoutInterest() * $month,
                $loan->monthlyAmountInterest() * $month,
                $amountWithInterest - $instalment * $month
            );
        }

        return $instalments;
    }
}