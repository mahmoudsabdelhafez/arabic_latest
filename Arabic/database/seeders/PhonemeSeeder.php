<?php

namespace Database\Seeders;

use App\Models\Phoneme;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PhonemeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $phonemes = [
            ['arabic_letter_id' => 1, 'ipa' => '/aː/', 'type' => 'Long Vowel', 'place_of_articulation' => 'Open, Front', 'manner_of_articulation' => 'Vowel', 'voicing' => 'Voiced', 'sound_effects' => 'Long open sound', 'notes' => 'Long version of "fatHa".'],
            ['arabic_letter_id' => 2, 'ipa' => '/b/', 'type' => 'Plosive', 'place_of_articulation' => 'Bilabial', 'manner_of_articulation' => 'Stop', 'voicing' => 'Voiced', 'sound_effects' => 'Popping effect', 'notes' => 'Often aspirated in fast speech.'],
            ['arabic_letter_id' => 3, 'ipa' => '/t/', 'type' => 'Plosive', 'place_of_articulation' => 'Dental/Alveolar', 'manner_of_articulation' => 'Stop', 'voicing' => 'Voiceless', 'sound_effects' => 'Crisp release', 'notes' => 'Tenuis, not aspirated.'],
            ['arabic_letter_id' => 4, 'ipa' => '/θ/', 'type' => 'Fricative', 'place_of_articulation' => 'Dental', 'manner_of_articulation' => 'Fricative', 'voicing' => 'Voiceless', 'sound_effects' => 'Hissing sound', 'notes' => 'Similar to English "th" in "think".'],
            ['arabic_letter_id' => 5, 'ipa' => '/d͡ʒ/', 'type' => 'Affricate', 'place_of_articulation' => 'Palato-Alveolar', 'manner_of_articulation' => 'Affricate', 'voicing' => 'Voiced', 'sound_effects' => 'Soft buzzing', 'notes' => '/ʒ/ in some dialects (Maghrebi).'],
            ['arabic_letter_id' => 6, 'ipa' => '/ħ/', 'type' => 'Fricative', 'place_of_articulation' => 'Pharyngeal', 'manner_of_articulation' => 'Fricative', 'voicing' => 'Voiceless', 'sound_effects' => 'Breathy, deep sound', 'notes' => 'Unique Arabic sound.'],
            ['arabic_letter_id' => 7, 'ipa' => '/x/', 'type' => 'Fricative', 'place_of_articulation' => 'Velar', 'manner_of_articulation' => 'Fricative', 'voicing' => 'Voiceless', 'sound_effects' => 'Harsh frication', 'notes' => 'Stronger than German "ach".'],
            ['arabic_letter_id' => 8, 'ipa' => '/d/', 'type' => 'Plosive', 'place_of_articulation' => 'Dental/Alveolar', 'manner_of_articulation' => 'Stop', 'voicing' => 'Voiced', 'sound_effects' => 'Crisp, clear', 'notes' => 'Tenuis.'],
            ['arabic_letter_id' => 9, 'ipa' => '/ð/', 'type' => 'Fricative', 'place_of_articulation' => 'Dental', 'manner_of_articulation' => 'Fricative', 'voicing' => 'Voiced', 'sound_effects' => 'Buzzing sound', 'notes' => 'Like "th" in "this".'],
            ['arabic_letter_id' => 10, 'ipa' => '/r/', 'type' => 'Flap/Trill', 'place_of_articulation' => 'Alveolar', 'manner_of_articulation' => 'Trill', 'voicing' => 'Voiced', 'sound_effects' => 'Rolling or tapping', 'notes' => 'Highly rolled in classical Arabic.'],
            ['arabic_letter_id' => 11, 'ipa' => '/z/', 'type' => 'Fricative', 'place_of_articulation' => 'Alveolar', 'manner_of_articulation' => 'Fricative', 'voicing' => 'Voiced', 'sound_effects' => 'Buzzing sound', 'notes' => 'Like English "z".'],
            ['arabic_letter_id' => 12, 'ipa' => '/s/', 'type' => 'Fricative', 'place_of_articulation' => 'Alveolar', 'manner_of_articulation' => 'Fricative', 'voicing' => 'Voiceless', 'sound_effects' => 'Sharp hissing', 'notes' => 'Strong sibilance.'],
            ['arabic_letter_id' => 13, 'ipa' => '/ʃ/', 'type' => 'Fricative', 'place_of_articulation' => 'Post-Alveolar', 'manner_of_articulation' => 'Fricative', 'voicing' => 'Voiceless', 'sound_effects' => 'Whispery hissing', 'notes' => 'Like "sh" in "she".'],
            ['arabic_letter_id' => 14, 'ipa' => '/sˤ/', 'type' => 'Fricative', 'place_of_articulation' => 'Alveolar', 'manner_of_articulation' => 'Fricative', 'voicing' => 'Voiceless', 'sound_effects' => 'Sharp, emphatic hissing', 'notes' => 'Velarized /s/.'],
            ['arabic_letter_id' => 15, 'ipa' => '/dˤ/', 'type' => 'Plosive', 'place_of_articulation' => 'Dental', 'manner_of_articulation' => 'Stop', 'voicing' => 'Voiced', 'sound_effects' => 'Emphatic, popping', 'notes' => 'Velarized /d/.'],
            ['arabic_letter_id' => 16, 'ipa' => '/tˤ/', 'type' => 'Plosive', 'place_of_articulation' => 'Dental/Alveolar', 'manner_of_articulation' => 'Stop', 'voicing' => 'Voiceless', 'sound_effects' => 'Emphatic, crisp', 'notes' => 'Velarized /t/.'],
            ['arabic_letter_id' => 17, 'ipa' => '/ðˤ/', 'type' => 'Fricative', 'place_of_articulation' => 'Dental', 'manner_of_articulation' => 'Fricative', 'voicing' => 'Voiced', 'sound_effects' => 'Emphatic buzzing', 'notes' => 'Velarized /ð/.'],
            ['arabic_letter_id' => 18, 'ipa' => '/ʕ/', 'type' => 'Fricative', 'place_of_articulation' => 'Pharyngeal', 'manner_of_articulation' => 'Fricative', 'voicing' => 'Voiced', 'sound_effects' => 'Deep, resonant', 'notes' => 'Unique pharyngeal Arabic sound.'],
            ['arabic_letter_id' => 19, 'ipa' => '/ɣ/', 'type' => 'Fricative', 'place_of_articulation' => 'Velar', 'manner_of_articulation' => 'Fricative', 'voicing' => 'Voiced', 'sound_effects' => 'Deep, resonant', 'notes' => 'Stronger than French /ʁ/.'],
            ['arabic_letter_id' => 20, 'ipa' => '/f/', 'type' => 'Fricative', 'place_of_articulation' => 'Labio-Dental', 'manner_of_articulation' => 'Fricative', 'voicing' => 'Voiceless', 'sound_effects' => 'Soft hissing', 'notes' => 'Like English "f".'],
            ['arabic_letter_id' => 21, 'ipa' => '/q/', 'type' => 'Plosive', 'place_of_articulation' => 'Uvular', 'manner_of_articulation' => 'Stop', 'voicing' => 'Voiceless', 'sound_effects' => 'Guttural, crisp', 'notes' => 'Strong uvular stop.'],
            ['arabic_letter_id' => 22, 'ipa' => '/k/', 'type' => 'Plosive', 'place_of_articulation' => 'Velar', 'manner_of_articulation' => 'Stop', 'voicing' => 'Voiceless', 'sound_effects' => 'Hard, crisp', 'notes' => 'Like "k" in "kite".'],
            ['arabic_letter_id' => 23, 'ipa' => '/l/', 'type' => 'Approximant', 'place_of_articulation' => 'Alveolar', 'manner_of_articulation' => 'Lateral', 'voicing' => 'Voiced', 'sound_effects' => 'Smooth flow', 'notes' => 'Like English "l".'],
            ['arabic_letter_id' => 24, 'ipa' => '/m/', 'type' => 'Nasals', 'place_of_articulation' => 'Bilabial', 'manner_of_articulation' => 'Nasal', 'voicing' => 'Voiced', 'sound_effects' => 'Murmuring sound', 'notes' => 'Like English "m".'],
            ['arabic_letter_id' => 25, 'ipa' => '/n/', 'type' => 'Nasals', 'place_of_articulation' => 'Alveolar', 'manner_of_articulation' => 'Nasal', 'voicing' => 'Voiced', 'sound_effects' => 'Nasal hum', 'notes' => 'Like English "n".'],
            ['arabic_letter_id' => 26, 'ipa' => '/h/', 'type' => 'Fricative', 'place_of_articulation' => 'Glottal', 'manner_of_articulation' => 'Fricative', 'voicing' => 'Voiceless', 'sound_effects' => 'Breathy, light', 'notes' => 'Like "h" in "hat".'],
            ['arabic_letter_id' => 27, 'ipa' => '/ʔ/', 'type' => 'Plosive', 'place_of_articulation' => 'Glottal', 'manner_of_articulation' => 'Stop', 'voicing' => 'Voiceless', 'sound_effects' => 'Glottal closure', 'notes' => 'Common in some Arabic dialects.'],
            ['arabic_letter_id' => 28, 'ipa' => '/j/', 'type' => 'Approximant', 'place_of_articulation' => 'Palatal', 'manner_of_articulation' => 'Glide', 'voicing' => 'Voiced', 'sound_effects' => 'Smooth, semi-vowel', 'notes' => 'Like "y" in "yes".'],
            ['arabic_letter_id' => 29, 'ipa' => '/ʔ/', 'type' => 'Glottal Stop', 'place_of_articulation' => 'Glottal', 'manner_of_articulation' => 'Stop', 'voicing' => 'Voiceless', 'sound_effects' => 'Abrupt cut-off, glottal closure', 'notes' => 'Hamza appears alone or as support.'],


        ];

        foreach ($phonemes as $phoneme) {
            Phoneme::create($phoneme);
        }
    }
}
