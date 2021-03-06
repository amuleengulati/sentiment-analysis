#! /usr/bin/env python

import tensorflow as tf
import numpy as np
import cnn
import os
import time
import datetime
import data_helpers
from text_cnn import TextCNN
from tensorflow.contrib import learn
import csv


tf.flags.DEFINE_string("positive_data_file", "C:\\wamp\\www\\project\\cnn_project\\data\\postest.csv", "Data source for the positive data.")
tf.flags.DEFINE_string("negative_data_file", "C:\\wamp\\www\\project\\cnn_project\\data\\"
                                             "negtest.csv", "Data source for the negative data.")


tf.flags.DEFINE_integer("batch_size", 64, "Batch Size (default: 64)")
tf.flags.DEFINE_string("checkpoint_dir", "C:\\wamp\\www\\project\\cnn_project\\runs\\1511273357", "")
tf.flags.DEFINE_boolean("eval_train", False, "Evaluate on all training data")

tf.flags.DEFINE_boolean("allow_soft_placement", True, "Allow device soft device placement")
tf.flags.DEFINE_boolean("log_device_placement", False, "Log placement of ops on devices")


FLAGS = tf.flags.FLAGS
FLAGS._parse_flags()
print("\nParameters:")
for attr, value in sorted(FLAGS.__flags.items()):
    print("{}={}".format(attr.upper(), value))
print("")

x_raw, y_test = data_helpers.load_data_and_labels(FLAGS.positive_data_file, FLAGS.negative_data_file)
y_test = np.argmax(y_test, axis=1)
#x_raw = ["an unbelievably non-thrilling experience", "could not have asked for a worse movie"]
#y_test = [0, 1]

vocab_path = "C:\\wamp\\www\\project\\cnn_project\\runs\\1511273357\\vocab"
vocab_processor = learn.preprocessing.VocabularyProcessor.restore(vocab_path)
x_test = np.array(list(vocab_processor.transform(x_raw)))
print("\nEvaluating...\n")

checkpoint_file = tf.train.latest_checkpoint("C:\\wamp\\www\\project\\cnn_project\\runs\\1511273357\\checkpoints")

graph = tf.Graph()
with graph.as_default():
    session_conf = tf.ConfigProto(
      allow_soft_placement=FLAGS.allow_soft_placement,
      log_device_placement=FLAGS.log_device_placement)
    sess = tf.Session(config=session_conf)
    with sess.as_default():

        saver = tf.train.import_meta_graph("{}.meta".format(checkpoint_file))
        saver.restore(sess, checkpoint_file)
        print(saver)
        input_x = graph.get_operation_by_name("input_x").outputs[0]
        dropout_keep_prob = graph.get_operation_by_name("dropout_keep_prob").outputs[0]

        predictions = graph.get_operation_by_name("output/predictions").outputs[0]

        batches = data_helpers.batch_iter(list(x_test), FLAGS.batch_size, 1, shuffle=False)

        all_predictions = []

        for x_test_batch in batches:
            batch_predictions = sess.run(predictions, {input_x: x_test_batch, dropout_keep_prob: 1.0})
            all_predictions = np.concatenate([all_predictions, batch_predictions])

if y_test is not None:
    correct_predictions = float(sum(all_predictions == y_test))
    print("Total number of test examples: {}".format(len(y_test)))
    print("Accuracy: {:g}".format(correct_predictions/float(len(y_test))))


cm = tf.confusion_matrix(y_test, all_predictions)
sess = tf.Session()
with sess.as_default():
    print(cm.eval())

predictions_human_readable = np.column_stack((np.array(x_raw), all_predictions))
out_path = os.path.join(FLAGS.checkpoint_dir, "..", "prediction.csv")
print("Saving evaluation to {0}".format(out_path))
with open(out_path, 'w') as f:
    csv.writer(f).writerows(predictions_human_readable)
print(cnn.score)