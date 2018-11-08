Research Logstash aggregate
===

# Aggregate filter with timeout

### Configuration

`logstash/aggregate_1.conf`

### Output

```
service-logstash | [2018-11-08T01:33:00,064][INFO ][logstash.inputs.jdbc     ] (0.000579s) SELECT * FROM search_result_in_view
service-logstash | [2018-11-08T01:33:00,076][INFO ][logstash.inputs.jdbc     ] (0.005234s) SELECT * FROM search_result_card_shared
service-logstash | -------------
service-logstash | type: search_result_in_view
service-logstash | logical_search_id: 101
service-logstash | -------------
service-logstash | type: search_result_in_view
service-logstash | logical_search_id: 101
service-logstash | -------------
service-logstash | type: search_result_in_view
service-logstash | logical_search_id: 102
service-logstash | -------------
service-logstash | type: search_result_in_view
service-logstash | logical_search_id: 101
service-logstash | -------------
service-logstash | type: search_result_in_view
service-logstash | logical_search_id: 101
service-logstash | -------------
service-logstash | type: search_result_in_view
service-logstash | logical_search_id: 102
service-logstash | -------------
service-logstash | type: search_result_card_shared
service-logstash | logical_search_id: 1001
service-logstash | -------------
service-logstash | logical_search_id: 101
service-logstash | search_result_in_view_count: 4
service-logstash | search_result_in_view_minrank: 1
service-logstash | search_result_in_view_rank_meanrank: 2.5
service-logstash | search_result_in_view_rank_medianrank: 3.0
service-logstash | -------------
service-logstash | logical_search_id: 102
service-logstash | search_result_in_view_count: 2
service-logstash | search_result_in_view_minrank: 1
service-logstash | search_result_in_view_rank_meanrank: 1.5
service-logstash | search_result_in_view_rank_medianrank: 1.5
```
