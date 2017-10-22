create or replace view quran_view as
SELECT DISTINCT ID,TEXT from translation_urdu_jalandhry 
union
SELECT DISTINCT ID,TEXT from translation_urdu_ahmed_ali
UNION
SELECT DISTINCT ID,TEXT from translation_english_pickthal
UNION
SELECT DISTINCT ID,TEXT from quran_in_default_script
UNION
SELECT DISTINCT ID,TEXT from quran_in_indopak_script
UNION
SELECT DISTINCT ID,TEXT from quran_in_usmani_script
