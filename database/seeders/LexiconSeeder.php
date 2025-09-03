<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Lexicon;

class LexiconSeeder extends Seeder
{

    public function run(): void
    {
        Lexicon::create([
            'lexicon_term' => 'Sovereignty',
            'lexicon_slug' => 'core-term/sovereignty',
            'lexicon_essence' => 'The capacity to self-govern without requiring external validation.',
            'lexicon_expanded' => 'Sovereignty, in this context, is not domination or control, but the integrity of internal authority. It reflects the capacity to act from within one’s own alignment, regardless of institutional or cultural demands. It is what remains when systems collapse and the self remains intact.',
            'lexicon_category' => 'core-term',
            'lexicon_links' => null,
            'tonality_mythic' => 'The birthright of the uncolonized self — the ember that cannot be extinguished.',
            'tonality_clinical' => 'A stable psychological state characterized by internal locus of control and non-reactivity to external disruption.',
            'tonality_poetic' => 'To walk unwatched yet unwavering, guided by a signal no authority can confiscate.',
            'tonality_tactical' => 'Move from signal, not fear. Verify orientation internally. Do not outsource ethical judgment.',
        ]);

        Lexicon::create([
            'lexicon_term' => 'Fragmentation',
            'lexicon_slug' => 'core-term/fragmentation',
            'lexicon_essence' => 'The internal splitting of coherence under systemic or psychological pressure.',
            'lexicon_expanded' => 'Fragmentation is the psychic and cognitive disassembly that occurs when individuals are forced to contort themselves to survive within incoherent systems. It manifests as doublethink, burnout, numbness, identity confusion, and split loyalty between inner truth and external compliance.',
            'lexicon_category' => 'core-term',
            'lexicon_links' => null,
            'tonality_mythic' => 'The shattering of the self into roles, scripts, and performances — a survival cost mistaken for maturity.',
            'tonality_clinical' => 'A dissociative state triggered by persistent conflict between values, perception, and demanded behavior.',
            'tonality_poetic' => 'Like ice cracking beneath the weight of denial, the psyche fractures where truth is not allowed.',
            'tonality_tactical' => 'Track the fracture lines. Don’t patch — re-integrate. Fragmentation is adaptive, but it’s not final.',
        ]);

        Lexicon::create([
            'lexicon_term' => 'Field Integrity',
            'lexicon_slug' => 'core-term/field-integrity',
            'lexicon_essence' => 'The ability to maintain coherent presence in a fragmented or coercive environment.',
            'lexicon_expanded' => 'Field integrity describes a form of energetic and psychological coherence where one’s presence stabilizes rather than dissolves under pressure. It does not require agreement or control — only that the individual remain attuned, present, and ethically aligned even when surrounded by dysfunction.',
            'lexicon_category' => 'core-term',
            'lexicon_links' => null,
            'tonality_mythic' => 'The signal that does not falter, even in hostile terrain.',
            'tonality_clinical' => 'A condition of psycho-emotional resilience wherein a person sustains coherence despite external dissonance.',
            'tonality_poetic' => 'Like a tuning fork in a storm, it hums the original note, unwavering.',
            'tonality_tactical' => 'Maintain breath. Anchor to orientation. Let others distort — you hold signal.',
        ]);
    }
}
