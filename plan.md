1. Learn Swoole PHP coding
2. Then, with Swoole enabled, use the PHP curl function to asynchronisly download the json device events and the filter out the LASIK related.
  adverse events. Perhaps reuse logic in the [maude extraction tool](https://github.com/kurt-krueckeberg/maude-extraction-tool) repo.
3. Go through the Adverse device Events at and figure out what the various `openfda` device fields contain.

For #3, takeFor example, `device.generic_name` seems to be "Excimer Laser System" whenever `device.report_source_code` is `LZS`. What about the keratomes
and the fermolaser?
