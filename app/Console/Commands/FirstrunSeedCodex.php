<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use App\Models\Library\_Epoch;

class FirstrunSeedCodex extends Command
{
    protected $signature = "firstrun:seedcodex";
    protected $description = "Seeds the Codex with core structural data.";

    public function handle(): void
    {
        $this->info("🚧 Seeding Codex Epochs...");

        //TODO: Update this data for accuracy.
        $epochs = [
            ["Chapter 1: The Rupture", "the-rupture", "Decide to move into RV, preparing, living in my house", "2024-02-20", "2024-04-11"],
            ["Chapter 2: The Transition", "the-transition", "Move out of house, into RV (on 47th birthday), detox from medications", "2024-04-11", "2024-05-11"],
            ["Chapter 3: The Pause", "the-pause", "Spend three months at the same campground, struggling to adapt", "2024-05-11", "2024-08-11"],
            ["Chapter 4: The Integration", "the-integration", "Discover my unfragmented nature; wrestle with understanding others", "2024-08-11", "2024-10-01"],
            ["Chapter 5: The Coherence", "the-coherence", "Disengage from audience, commit to journey north with comments off", "2024-10-01", "2024-11-01"],
            ["Chapter 6: The Embodiment", "the-embodiment", "Cross-country solo journey, desert reflection in Nevada", "2024-11-01", "2024-12-01"],
            ["Chapter 7: The Expansion", "the-expansion", "Arrive on Oregon coast, flirtation redirects journey, deep exploration", "2024-12-01", "2025-03-01"],
            ["Chapter 8: The Refinement", "the-refinement", "Begin volunteering at parks, find alignment, deepen grounding", "2025-03-01", "2025-04-01"],
            ["Chapter 9: The Crucible", "the-crucible", "Evicted from park system, go off-grid, forced realignment", "2025-04-01", "2025-04-11"],
            ["Chapter 10: The Forge", "the-forge", "Volunteer with forest service, rebuild identity, new homepage project", "2025-04-11", null],
        ];

        foreach ($epochs as [$title, $slug, $summary, $start, $end]) {
            _Epoch::updateOrCreate(
                [
                    "epoch_title" => $title,
                    "epoch_slug" => $slug,
                    "epoch_summary" => $summary,
                    "epoch_start" => $start,
                    "epoch_end" => $end,
                    "flag_active" => true,
                ]
            );
        }


        $this->info("✅ Codex Epochs Seeded.");

        //TODO: Add more data.

        $this->line("\n✨ Codex Initialized. Begin transmission.");
    }
}
