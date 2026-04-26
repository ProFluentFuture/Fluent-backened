import json; import sys; 
try:
    with open('storage/app/private/lessons/college_level.json', 'r', encoding='utf-8') as f:
        json.load(f)
    print('Valid JSON')
except json.JSONDecodeError as e:
    print(f'Error at line {e.lineno}, column {e.colno}: {e.msg}')
