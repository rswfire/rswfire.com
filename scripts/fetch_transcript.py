# /scripts/fetch_transcript.py

import sys
import json
from youtube_transcript_api import YouTubeTranscriptApi

if len(sys.argv) != 2:
    print(json.dumps({"error": "Missing YouTube ID"}))
    sys.exit(1)

video_id = sys.argv[1]

try:
    transcript = YouTubeTranscriptApi.get_transcript(video_id)
    # Concatenate text only
    transcript_text = "\n".join([chunk["text"] for chunk in transcript])
    print(json.dumps({"transcript": transcript_text}))
except Exception as e:
    print(json.dumps({"error": str(e)}))
    sys.exit(1)
