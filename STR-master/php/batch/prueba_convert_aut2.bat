ffmpeg.exe -i i:/trailer/mov/344.mp4 -c:v h264_nvenc -crf 35 -gpu 0 -vf scale=854:480 -b:v 298k -c:a libopus -movflags faststart i:/trailer/mov/sd/344.mp4
ffmpeg.exe -i k:/cont/mov/344.mp4 -c:v h264_nvenc -crf 35 -gpu 0 -vf scale=854:480 -b:v 298k -c:a libopus -movflags faststart k:/cont/mov/sd/344.mp4
